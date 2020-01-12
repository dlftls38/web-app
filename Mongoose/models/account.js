var mongoose = require('mongoose');
var Schema = mongoose.Schema;

var accountSchema = new Schema({
    title: String,
    author: String,
    published_date: { type: Date, default: Date.now  }
});

module.exports = mongoose.model('account', accountSchema);
