// For authoring Nightwatch tests, see
// http://nightwatchjs.org/guide#usage

module.exports = {
  'index e2e tests': function (browser) {
    browser
    .url('http://localhost:8080')
      .waitForElementVisible('body', 1000)
      .end()
  }
}
