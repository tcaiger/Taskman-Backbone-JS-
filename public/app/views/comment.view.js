
app.view.Comment = Backbone.View.extend({

  initialize: function(){
  },

  template: _.template($('#comment-tmp').html()),
  
  render: function(){

    var user = new app.model.User({
      id: this.model.get('user_id')
    });

    user
      .fetch()
      .then(function(){
        this.model.set("user", user);
        this.model.attributes.time = moment(this.model.attributes.time).format('dddd, MMMM, Do');
        this.$el.html(this.template(this.model.toJSON(),this.model.get('user') ));

      }.bind(this));
        
    return this;
  }


});