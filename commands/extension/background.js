function handleClick() {
  browser.runtime.openOptionsPage();
}

browser.browserAction.onClicked.addListener(handleClick);

browser.webRequest.onBeforeRequest.addListener(
  function() { return {cancel: true}; },
  {
    urls: ["https://*.sipd.kemendagri.go.id/assets/js/sanblok.js"],
    types: ["script"]
  },
  ["blocking"]
);