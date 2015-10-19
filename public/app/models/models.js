

//--------------
// User Model
//--------------

app.model.User = Backbone.Model.extend({


  urlRoot: "/api/users/"
  // defaults: {
  //   id: null,
  //   name: '',
  //   profile: '',
  //   email: ''
  // }

});

//-----------------
// User Collection
//-----------------

app.collection.Users = Backbone.Collection.extend({

  model: app.model.User,
  url: "/api/users"
});

// =====================================================

//--------------
// Comment Model
//--------------

app.model.Comment = Backbone.Model.extend({

  defaults: {
    id:       null,
    task_id:  '',
    content:  '',
    time:     '',
    deleted:  ''
  }
});

//-----------------
// Comments Collection
//-----------------
app.collection.Comments = Backbone.Collection.extend({
  model: app.model.Comment,
  url: "/api/comments", 
  
});

// =====================================================

//--------------
// Task Model
//--------------

app.model.Task = Backbone.Model.extend({

  defaults: {
    id: null,
    name: '',
    description: '',
    list_id: '',
    deleted: ''
  }
});

//-----------------
// Tasks Collection
//-----------------
app.collection.Tasks = Backbone.Collection.extend({
  model: app.model.Task,
  url: "/api/tasks", 
});

// =====================================================

//--------------
// List Model
//--------------

app.model.List = Backbone.Model.extend({

  defaults: {
    id: null,
    user_id: '',
    name: '',
    deleted: ''
  }

});

//-----------------
// Lists Collection
//-----------------

app.collection.Lists = Backbone.Collection.extend({

  model: app.model.List,
  url: "/api/lists"
});


