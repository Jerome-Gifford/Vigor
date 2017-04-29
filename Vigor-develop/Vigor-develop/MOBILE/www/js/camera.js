//capture the photo	
function capturePhoto() {
	navigator.camera.getPicture(uploadPhoto,null,{soucreType:1,quality:60});
}

//send image file to server
function uploadPhoto(data) {

//output image to screen
	cameraPic.src = "data:image/jpeg;base64," + data;
}
