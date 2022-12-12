
window.addEventListener('popstate', function (e) {
    e.preventDefault();
    e.stopImmediatePropagation();
    alert('pop');
})

window.addEventListener('load', function (e) {
  // call an ajax to verify current location
  var domain = window.location.pathname.substring(
    0,
    window.location.pathname.lastIndexOf("/")
  );

  var currentLocation = window.location.pathname.substring(
    window.location.pathname.lastIndexOf("/") + 1
  );

  var roothPath = `${window.location.origin}${domain}`;

  // reports to the location guard server the current location
  $.ajax({
    url: `${roothPath}/js/location-guard.php`,
    method: "post",
    data: {
      location: currentLocation,
    },
    success: (res) => {
      res = JSON.parse(res);
      if (res.state) {
        window.location.replace(`${roothPath}/${res.location}`);
      }
    },
    error: (err) => {
        window.location.replace(`${roothPath}/index.php`);
    },
  });
});
