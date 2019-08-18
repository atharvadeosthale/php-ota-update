# php-ota-update
A sample PHP script showing pushing OTA updates to PHP Projects.

<h1>PHP OTA System</h1>
This project is a sample of how one can push OTA Updates to almost any kind of project.<br>
This method is useful when you don't want to disturb your client taking the control over, instead, you simply push OTA Updates to the project according to their need.<br>
Here's how the basic model works:-
<ol>
<li>First, the project calls an HTTP Request to the master server using the POST method with the current version details of the project. </li>
<li>When the master server receives the HTTP Request, the server checks the received data to know if the project needs an Update.</li>
<li>If the project needs an Update, the server would send back the Status Code of the HTTP Request and the Update Package link to the project in the form of JSON Response.</l>
<li>The project now downloads the Update Package [used using file_get_contents() and file_put_contents().].</li>
<li>The project would now extract the Update Package and put it in a special folder. When the extraction is successful, the project automatically executes and passes control over the update.php file in the package</li>
</ol><br>
This would help many developers to make an OTA System for whatever project they're using because this makes things easier and is reliable for larger audience.<br>
<b>PS:</b> I am just a student, so Sorry for any major faults in the project.<br>
<i>Your feedback is always welcome</i>
