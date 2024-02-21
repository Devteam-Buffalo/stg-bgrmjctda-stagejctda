"use strict";

var assert = require("assert");

module.exports = function ensureIterability() {
  require("jsdom").env("", function (errors, window) {
    assert.ifError(errors);

    var i,
    ensureJQuery = require("./ensure_jquery"),
    jQuery = require("../../../dist/jquery.js")(window),
    elem = jQuery("<div></div><span></span><a></a>"),
    result = "";

    ensureJQuery(jQuery);var _iteratorNormalCompletion = true;var _didIteratorError = false;var _iteratorError = undefined;try {

      for (var _iterator = elem[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {i = _step.value;
        result += i.nodeName;
      }} catch (err) {_didIteratorError = true;_iteratorError = err;} finally {try {if (!_iteratorNormalCompletion && _iterator.return != null) {_iterator.return();}} finally {if (_didIteratorError) {throw _iteratorError;}}}

    assert.strictEqual(result, "DIVSPANA", "for-of works on jQuery objects");
  });
};
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImVuc3VyZV9pdGVyYWJpbGl0eV9lczYuanMiXSwibmFtZXMiOlsiYXNzZXJ0IiwicmVxdWlyZSIsIm1vZHVsZSIsImV4cG9ydHMiLCJlbnN1cmVJdGVyYWJpbGl0eSIsImVudiIsImVycm9ycyIsIndpbmRvdyIsImlmRXJyb3IiLCJpIiwiZW5zdXJlSlF1ZXJ5IiwialF1ZXJ5IiwiZWxlbSIsInJlc3VsdCIsIm5vZGVOYW1lIiwic3RyaWN0RXF1YWwiXSwibWFwcGluZ3MiOiJBQUFBOztBQUVBLElBQUlBLFNBQVNDLFFBQVMsUUFBVCxDQUFiOztBQUVBQyxPQUFPQyxPQUFQLEdBQWlCLFNBQVNDLGlCQUFULEdBQTZCO0FBQzdDSCxVQUFTLE9BQVQsRUFBbUJJLEdBQW5CLENBQXdCLEVBQXhCLEVBQTRCLFVBQVVDLE1BQVYsRUFBa0JDLE1BQWxCLEVBQTJCO0FBQ3REUCxXQUFPUSxPQUFQLENBQWdCRixNQUFoQjs7QUFFQSxRQUFJRyxDQUFKO0FBQ0NDLG1CQUFlVCxRQUFTLGlCQUFULENBRGhCO0FBRUNVLGFBQVNWLFFBQVMseUJBQVQsRUFBc0NNLE1BQXRDLENBRlY7QUFHQ0ssV0FBT0QsT0FBUSxpQ0FBUixDQUhSO0FBSUNFLGFBQVMsRUFKVjs7QUFNQUgsaUJBQWNDLE1BQWQsRUFUc0Q7O0FBV3RELDJCQUFXQyxJQUFYLDhIQUFrQixDQUFaSCxDQUFZO0FBQ2pCSSxrQkFBVUosRUFBRUssUUFBWjtBQUNBLE9BYnFEOztBQWV0RGQsV0FBT2UsV0FBUCxDQUFvQkYsTUFBcEIsRUFBNEIsVUFBNUIsRUFBd0MsZ0NBQXhDO0FBQ0EsR0FoQkQ7QUFpQkEsQ0FsQkQiLCJmaWxlIjoiZW5zdXJlX2l0ZXJhYmlsaXR5LmpzIiwic291cmNlc0NvbnRlbnQiOlsiXCJ1c2Ugc3RyaWN0XCI7XG5cbnZhciBhc3NlcnQgPSByZXF1aXJlKCBcImFzc2VydFwiICk7XG5cbm1vZHVsZS5leHBvcnRzID0gZnVuY3Rpb24gZW5zdXJlSXRlcmFiaWxpdHkoKSB7XG5cdHJlcXVpcmUoIFwianNkb21cIiApLmVudiggXCJcIiwgZnVuY3Rpb24oIGVycm9ycywgd2luZG93ICkge1xuXHRcdGFzc2VydC5pZkVycm9yKCBlcnJvcnMgKTtcblxuXHRcdHZhciBpLFxuXHRcdFx0ZW5zdXJlSlF1ZXJ5ID0gcmVxdWlyZSggXCIuL2Vuc3VyZV9qcXVlcnlcIiApLFxuXHRcdFx0alF1ZXJ5ID0gcmVxdWlyZSggXCIuLi8uLi8uLi9kaXN0L2pxdWVyeS5qc1wiICkoIHdpbmRvdyApLFxuXHRcdFx0ZWxlbSA9IGpRdWVyeSggXCI8ZGl2PjwvZGl2PjxzcGFuPjwvc3Bhbj48YT48L2E+XCIgKSxcblx0XHRcdHJlc3VsdCA9IFwiXCI7XG5cblx0XHRlbnN1cmVKUXVlcnkoIGpRdWVyeSApO1xuXG5cdFx0Zm9yICggaSBvZiBlbGVtICkge1xuXHRcdFx0cmVzdWx0ICs9IGkubm9kZU5hbWU7XG5cdFx0fVxuXG5cdFx0YXNzZXJ0LnN0cmljdEVxdWFsKCByZXN1bHQsIFwiRElWU1BBTkFcIiwgXCJmb3Itb2Ygd29ya3Mgb24galF1ZXJ5IG9iamVjdHNcIiApO1xuXHR9ICk7XG59O1xuIl19
