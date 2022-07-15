const axios = require('axios');
console.log("after every 30 minute");
let countryInfolookup = async() => {
    const response = await axios.get < string > (`https://um.dk/da/rejse-og-ophold/rejse-til-udlandet/rejsevejledninger/?appjson=true&v=2`);
    console.log("Returned with reponse", response)
    return response.data;
};
const details = await countryInfolookup();
console.log("country information");
console.log(details);