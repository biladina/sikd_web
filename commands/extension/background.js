browser.contextMenus.create({
    id: "search-in-linuxconfig",
    title: "Search in linuxconfig.org",
    contexts: ["selection"],
});

browser.contextMenus.onClicked.addListener(function(info, tab) {
  switch (info.menuItemId) {
    case "search-in-linuxconfig":
      const url = encodeURI(`https://linuxconfig.org/linux-config?searchword=${info.selectionText}&searchphrase=all`);
      browser.tabs.create({
        active: true,
        url
      });

      break;
  }
});