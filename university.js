// JavaScript Document

function createOption(value,ele) {
    el = document.createElement('option');
    el.value = value;
    el.innerHTML = value;
    el.id = value;   
    document.getElementById(ele).appendChild(el);
}

function getUniversities(){ 
	var rdata = $('#university_zone').val();
	$.ajax({
			url:'universities.php',
			type:'POST',
			async:false,
			data:{uni:rdata},
			dataType:'html',
			success:function(data, status){
				if(data != "null"){
					var obj = JSON.parse(data);
					document.getElementById('university_name').innerHTML = '';
					createOption('University Name','university_name');
					for(var i=0; i<obj.length;i++){
						createOption(obj[i].university_name,'university_name');
					}
					createOption('Others','university_name');
				}
			}
		});
			
}

//document.getElementById('university_zone').addEventListener('change', function() {
function changeVals(){  
	if(document.getElementById('university_zone').value == "south east"){
		document.getElementById('university_state').innerHTML = '';
		createOption('University State','university_state');
		createOption('ANAMBRA','university_state');
		createOption('ENUGU','university_state');
		createOption('EBONYI','university_state');
		createOption('IMO','university_state');
		createOption('ABIA','university_state');
	}else if(document.getElementById('university_zone').value == "south south"){
		document.getElementById('university_state').innerHTML = '';
		createOption('University State','university_state');
		createOption('EDO','university_state');
		createOption('DELTA','university_state');
		createOption('RIVERS','university_state');
		createOption('BAYELSA','university_state');
		createOption('CROSS RIVER','university_state');
		createOption('AKWA IBOM','university_state');
	}else if(document.getElementById('university_zone').value == "south west"){
		document.getElementById('university_state').innerHTML = '';
		createOption('University State','university_state');
		createOption('LAGOS','university_state');
		createOption('OGUN','university_state');
		createOption('OYO','university_state');
		createOption('OSUN','university_state');
		createOption('ONDO','university_state');
		createOption('EKITI','university_state');
	}else if(document.getElementById('university_zone').value == "north central"){
		document.getElementById('university_state').innerHTML = '';
		createOption('University State','university_state');
		createOption('KWARA','university_state');
		createOption('KOGI','university_state');
		createOption('PLATEAU','university_state');
		createOption('NASSARAWA','university_state');
		createOption('BENUE','university_state');
		createOption('NIGER','university_state');
	}else if(document.getElementById('university_zone').value == "north east"){
		document.getElementById('university_state').innerHTML = '';
		createOption('University State','university_state');
		createOption('TARABA','university_state');
		createOption('ADAMAWA','university_state');
		createOption('BORNO','university_state');
		createOption('YOBE','university_state');
		createOption('BAUCHI','university_state');
		createOption('GOMBE','university_state');
	}else if(document.getElementById('university_zone').value == "north west"){
		document.getElementById('university_state').innerHTML = '';
		createOption('University State','university_state');
		createOption('SOKOTO','university_state');
		createOption('ZAMFARA','university_state');
		createOption('KEBBI','university_state');
		createOption('KADUNA','university_state');
		createOption('KATSINA','university_state');
		createOption('KANO','university_state');
		createOption('JIGAWA','university_state');
	}
};//);