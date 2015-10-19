
app.view.Modal = Backbone.View.extend({

  template: _.template($('#modal-tmp').html()),

  initialize: function () {
    
    this.collection = new app.collection.Comments();
    this.collection.fetch(
      { 
        add: false,
        reset: true,
        data: $.param({ task_id: this.model.get('id')})
      }
    );
    
    this.collection.on('add', this.renderNew, this);
    this.collection.on('reset', this.renderComments, this);
  },

  render: function(){

    this.$('.placeholder').html(this.template(this.model.toJSON()));
    this.input = this.$('.description-edit')
    return this;
  },

  renderComments: function(){

    this.$('.counter').html(this.collection.length);
    this.$('.comments-container').html('');
    this.collection.each(function(comment){

      var view = new app.view.Comment({
        model:      comment
      });

      this.$('.comments-container').append(view.render().el);
    }, this);
  },

  renderNew: function(){
    this.$('.counter').html(this.collection.length);
    var id = this.collection.length-1;
    var newModel = this.collection.at(id);
    var view = new app.view.Comment({
      model: newModel
    });
    this.$('.comments-container').append(view.render().el);
  },

  events: {
    'click #new-comment+button'   : 'create',
    'keypress #new-comment'       : 'createOnEnter',
    'dblclick .task-description'  : 'edit',
    'keypress .description-edit'  : 'updateOnEnter',
    'blur .description-edit'      : 'close'
  },

  edit: function(){
    this.$('.description-container').addClass('editing');
    this.input.focus();
  },

  close: function(){
    var value = this.input.val();
    console.log(value);
    if(value){
      this.model.save({description: value});
    }
    this.$('.description-container').removeClass('editing');
  },

  updateOnEnter: function(e){
    if(e.which ==13){
      this.close();
    }
  },

  createOnEnter: function(e){
     if(e.which ==13){
      this.create();
    }
  },

  create: function(){
    var newCommentInput = this.$('#new-comment');
    this.collection.create(
      {task_id:     this.model.get('id'), 
      content:     newCommentInput.val(),
      time:        moment().format('YYYY-MM-DD HH:mm:ss')},
      { wait: true }
      );
    newCommentInput.val('');
  }

});