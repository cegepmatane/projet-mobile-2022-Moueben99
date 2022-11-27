document.addEventListener('deviceready', onDeviceReady, false);

            function onDeviceReady() {
                document.getElementById("cameraGetPicture").addEventListener("click", cameraGetPicture);

                            function cameraGetPicture() {
               navigator.camera.getPicture(onSuccess, onFail, { quality: 50,
                  destinationType: Camera.DestinationType.FILE_URL,
                  sourceType: Camera.PictureSourceType.PHOTOLIBRARY
               });

               function onSuccess(imageURL) {
                  var image = document.getElementById('myImage');
                  image.src = imageURL;
               }

               function onFail(message) {
                  alert('Failed because: ' + message);
               }

            }
            }