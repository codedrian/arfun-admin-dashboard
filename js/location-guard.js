// // prevents explicit access to unauthorized links
// // this is required for role base access

// var oldLocation = document.location.href;

// window.addEventListener("load", function () {

//   var bodyList = document.querySelector("body");

//   var observer = new MutationObserver(function (mutations) {
//     mutations.forEach(function (mutation) {
//       if (oldLocation != document.location.href) {
//         alert("location chhanged");
//         // check if location is accessible base on role if not redirect to old location
//         oldLocation = document.location.href;
//       }
//     });
//   });

//   var config = {
//     childList: true,
//     subtree: true,
//   };

//   observer.observe(bodyList, config);
// });

// window.addEventListener('haschange', function(e){
//   console.log(oldLocation);
//   alert(oldLocation);
//   e.preventDefault();
// });

