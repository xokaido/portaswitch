# The PortaSwitch API library in PHP

This is a PortaSwitch Client Library Based on their PortaSwitch_Interfaces_MR45.pdf document.
The client library is not finished and only some parts are implemented but it's easy to add more as
the software architecture makes it possible to quickly add new methods.

## To deploy the application:

You need to create the .env file with

`API_BASE` = Base URL of the API<br/>
`API_USER` = The API user <br/>
`API_PASS` = The password for the API user<br/>

The file should look something like this:

`API_BASE` = "https://mybilling.telinta.com:8442/rest/"<br/>
`API_USER` = 'test_user'<br/>
`API_PASS` = 'test_pass'<br/>

Please pay desired attention to have the `/rest/` API instead of SOAP.

## Examples 

For examples check the example.php file.

Thank you!
