app.view.List = Backbone.View.extend({

   tagName: 'div',

   className: 'list well',

  initialize: function(){
    
    this.collection = new app.collection.Tasks();
    this.collection.fetch(
      { 
        add: false,
        reset: true,
        data: $.param({ list_id: this.model.get('id')})
      }
    );
    
    if(!app.lists) app.lists = {};

    app.lists[this.model.id] = this;

    this.model.on('change', this.renderListName, this);
    this.model.on('destroy', this.remove, this);

    this.collection.on('reset', this.renderTasks, this);
    this.collection.on('add', this.renderNew, this);
  },

  template: _.template($('#list-tmp').html()),

  render: function(){
    this.$el.html(this.template(this.model.toJSON()));
    this.input = this.$('.list-edit');
    return this;
  },

  rerender: function(){
    this.collection.fetch(
      { 
        add: false,
        reset: true,
        data: $.param({ list_id: this.model.get('id')})
      }
    );
  },

  renderTasks: function(){

    this.$('#tasks-container').html('');
    this.collection.each(function(task){

      this.arrows(task);
      var view = new app.view.Task({
        model:      task
      });

      this.$('#tasks-container').append(view.render().el);

    }, this);
    return this;
  },

  renderNew: function(){
    var id = this.collection.length-1;
    var newModel = this.collection.at(id);
    this.arrows(newModel);
    var view = new app.view.Task({
      model: newModel
    });
    this.$('#tasks-container').append(view.render().el);
  },

  arrows: function(task){
    var list_id = this.model.id;
    var array = this.model.collection.models;
    
    for (var i = 0; i < array.length; i++) {
      var loop_id = array[i].get('id');

      // If this is the position of the list in the array
      if (list_id == loop_id) {
        
        // If there is a previous list
        if (i>0) {
          task.set('prevList', array[i-1].get('id'));
        };
        // If there is another list
        if (i<array.length-1) {
          task.set('nextList', array[i+1].get('id'));
        };
      };
    };
  },

  renderListName: function(){

    $('.list-name', this.$el).html(this.model.get('name'));
  },


  events: {

    'click .list-name'        : 'edit',
    'keypress .list-edit'     : 'updateOnEnter',
    'blur .list-edit'         : 'close',
    'click .destroyList'      : 'destroy',
    'click .new-task+button'  : 'create',
    'keypress .new-task'      : 'createOnEnter'
  },

  edit: function(){
    this.$el.addClass('list-editing');
    this.input.focus();
  },

  close: function(){
    var value = this.input.val();
    if(value){
      this.model.save({name: value});
    }
    this.$el.removeClass('list-editing');
  },

  updateOnEnter: function(e){
    if(e.which ==13){
      this.close();
    }
  },

  destroy: function(){
    var response = confirm('Are you sure you want to delete this list?');
    if (response == true) {

        var list_id = this.model.id;
        var array = this.model.collection.models;
        
        for (var i = 0; i < array.length; i++) {
          
          var loop_id = array[i].get('id');

          if (list_id == loop_id) {
            // If there is a previous list
            this.model.destroy();
            if (i>0) {
              
              app.lists[array[i-1].id].rerender();
            };
            // If there is another list
            // i now refers to the list after the deleted one
            if (i<array.length) {
             
              app.lists[array[i].id].rerender();
            };

          }
        }
    }
  },

  createOnEnter: function(e){
     if(e.which ==13){
      this.create();
    }
  },

  create: function(){
    var newTaskInput = this.$('.new-task');
    this.collection.create({ 
      name:     newTaskInput.val(),
      list_id: this.model.get('id'),
      description: 'Double Click to add a task description...'
    });
    
    newTaskInput.val('');
  }

 
});
