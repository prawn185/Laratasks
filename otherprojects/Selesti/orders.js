const request = require("request");
const fs = require('fs');
const json2csv = require('json2csv');
const readline = require('readline');

const rl = readline.createInterface({
    input: process.stdin,
    output: process.stdout
});

rl.question('Please provide either an order ID or leave blank for all orders: ', (answer) => {

    var orderid =  answer;

var url = (answer === '') ? '' : '/';

const options = {
    method: 'GET',
    url: 'https://dummy-api.selesti.agency/orders'+url+orderid,
    headers: {
        'X-Authorisation': 'R4o6rHAvpEhUOmVR'
    }
};

const writeToCsvFile = function(csvString) {
    const outputDir = 'reports';
    if (!fs.existsSync(outputDir)) {
        fs.mkdirSync(outputDir);
    }
    const fileName = (answer === '') ? 'report-'+Date.now()+'.csv' : 'single-report-'+orderid+'-'+Date.now()+'.csv';

    fs.writeFile(`./${outputDir}/${fileName}`, csvString, function (err) {
        if (err) return console.log(err);
        console.log('--------------------------------------');
        console.log('Report saved!');
        console.log('--------------------------------------');
    });
}

const createCsvString = function(data) {

    const fields = [
        { label: 'OrderID', value: 'id' },
        { label: 'HasCustomerPaid', value: 'isPaidFor' },
        { label: 'CustomerName', value: 'customer.name' },
        { label: 'CustomerEmail', value: 'customer.email' }
    ];

    if(answer !== '') {

        fields.push({ label: 'NumberOfItemsPurchased', value: 'items.length' }) ;
        fields.push({ label: 'TotalOrderPriceInPounds',
            value: function(row, field, data) {

                var total = 0;
                row.items.forEach((item) => total += item.price_in_pennies);
                return total / 100;
            },
            default: 'NULL',
            stringify: true
        })
    }

    try {
        const result = json2csv({
            data: data,
            fields: fields
        });

        console.log(result);
        writeToCsvFile(result);
    } catch (err) {
        console.error(err);
    }
}

request(options, function (error, response, body) {
    if (error) throw new Error(error);
    const data = JSON.parse(body).data;
    createCsvString(data);
});

rl.close()
});