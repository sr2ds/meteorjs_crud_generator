_NameUper = new Mongo.Collection("_name");
_NameUperSchemas = new SimpleSchema({
    _table
});

_NameUper.allow({
    'insert': function (doc) {
        return true;
    }
});

_NameUper.attachSchema(_NameUperSchemas);

Meteor.publish('_name', function () {
    return _NameUper.find();
});
