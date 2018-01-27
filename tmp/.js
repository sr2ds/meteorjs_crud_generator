 = new Mongo.Collection("");
Schemas = new SimpleSchema({
    null
});

.allow({
    'insert': function (doc) {
        return true;
    }
});

.attachSchema(Schemas);

Meteor.publish('', function () {
    return .find();
});
