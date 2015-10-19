
app.view.Task = Backbone.View.extend({

  tagName: 'div',

  className: 'task-card',

  initialize: function(){
    this.model.on('change', this.render, this);
    this.model.on('destroy', this.remove, this);
  },

  template: _.template($('#task-card-tmp').html()),
  
  render: function(){

    if($('body').hasClass('modal-open')){
      this.$('.task-description').html(this.model.get('description'));
    }else{
      this.renderTask();
      this.renderModal(); 
    }
    return this;
  },

  renderTask: function(){

    this.$el.html(this.template(this.model.toJSON()));

    if (this.model.has('prevList')) {
      this.$('.left').addClass('visible');
    };
    if (this.model.has('nextList')) {
      this.$('.right').addClass('visible');
    };
    this.input = this.$('.edit');
    
    return this;
  },

  renderModal: function(){
    app.view.modal = new app.view.Modal({ model: this.model });
    app.view.modal.render();
    this.assign(app.view.modal, '.task-icons');
    return this;
  },

  assign: function(view, selector){
    view.setElement(this.$(selector)).render();
  },

  events: {
    'click .pencil'       : 'edit',
    'keypress .edit'      : 'updateOnEnter',
    'blur .edit'          : 'close',
    'click .destroy'      : 'destroy',
    'click .left'         : 'moveLeft',
    'click .right'        : 'moveRight'
  },

  moveLeft: function(){
    var num = this.model.get('list_id');
    this.model.set("list_id", this.model.get('prevList'));
  
    this.model.save()
      .then(function(res){
        app.lists[res.list_id].rerender();
        app.lists[num].rerender();
    }.bind(this));
  },

  moveRight: function(){

    var num = this.model.get('list_id');

    this.model.set("list_id", this.model.get('nextList'));

    this.model.save()
      .then(function(res){
        app.lists[res.list_id].rerender();
        app.lists[num].rerender();

    }.bind(this));
   
  },

  edit: function(){
    this.$el.addClass('editing');
    this.input.focus();
  },

  close: function(){
    var value = this.input.val();
    if(value){
      this.model.save({name: value});
    }
    this.$el.removeClass('editing');
  },

  updateOnEnter: function(e){
    if(e.which ==13){
      this.close();
    }
  },

  destroy: function(){
    var response = confirm('Are you sure you want to delete this task?');
    if (response == true) {
        this.model.destroy();
    }
  }

  
});