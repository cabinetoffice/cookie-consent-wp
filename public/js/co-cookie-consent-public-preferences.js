function setupPrefRadio(name, optedIn) {
  let radioButton = document.getElementById(name + (optedIn ? "-on" : "-off"));
  radioButton.checked = true;
}

function getPrefRadio(name) {
  return document.querySelector('input[name="' + name + '"]:checked').value === "on";
}

let policy = retrieveCookiePolicy();
//setupPrefRadio("cookie-settings", policy.settings);
setupPrefRadio("cookie-website", policy.settings);
//setupPrefRadio("cookie-comms", policy.campaigns);

let btnSave = document.getElementById("btn-save");
btnSave.onclick = function() {
  storeCookiePolicy(
  true,
  //getPrefRadio("cookie-settings"),
  getPrefRadio("cookie-website"),
  //getPrefRadio("cookie-comms")
  );
  document.getElementById("save_confirm").style.display = "block";
  document.getElementById("global-cookie-message").style.display = "none";
  document.getElementById("global-cookie-confirm").style.display = "none";
  window.scrollTo(0,0);
};