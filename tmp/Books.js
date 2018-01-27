Books = new Mongo.Collection("books");

BooksSchemas = new SimpleSchema({
    name: { type: String, label: name, max: 35, optional: false },
    writer: { type: String, label: writer, max: 50, optional: true },
});

Books.allow({
    'insert': function (doc) {
        return true;
    }
});

Books.attachSchema(BooksSchemas);

Meteor.publish('books', function () {
    return Books.find();
});
