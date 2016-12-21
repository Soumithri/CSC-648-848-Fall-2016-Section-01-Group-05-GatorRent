<!DOCTYPE html>

    <body>
         
            <div class="container">    
            <div class ="panel panel-default panel-body"><h1 align="center" ID="head">Post an Apartment</h1>
                <h2></h2>
                                
<form data-toggle="validator" class="form-horizontal"  action="<?php echo URL; ?>/apartment_upload/upload/" enctype="multipart/form-data" method="post">
  <div class="form-group has-feedback" >
   <div> <label class="control-label col-md-2">Title</label></div>
    <div class="col-md-10">
      <input type="text" name="title" class="form-control  col-xs-4" placeholder="25 Character Limit" pattern=".{0,25}" required>
<!--      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>-->
<!--      <div class="help-block with-errors"></div>-->
    </div>
  </div>
 <div class="form-group has-feedback">
    <label class="control-label col-sm-2">Contract End Date</label>
    <div class="col-sm-10">
 <input type="text" name="leaseEndDate" class="form-control" placeholder="12-31-2017" pattern="([0-9]{1,2})+-([1-9]{2,2})+-[0-9]{4,4}$" required>
    </div>
  </div>
  <div class="form-group has-feedback">
    <label class="control-label col-sm-2">Address</label>
    <div class="col-sm-10">
    <input type="text" name="address1" method="post" class="form-control" placeholder="1214 Northgate Lane" pattern=".[A-Za-z0-9 ]{0,50}" required>
<!--    <div class="help-block with-errors"></div>-->
    </div> 
  </div>
  <div class="form-group has-feedback">
    <label class="control-label col-sm-2">Apartment</label>
    <div class="col-sm-10">
    <input type="text" name="address2" class="form-control" placeholder="Apt 2 (Optional)">
    </div> 
  </div>
  <div class="form-group has-feedback">
    <label class="control-label col-sm-2">City</label>
    <div class="col-sm-10">
    <input type="text" name="city" class="form-control" placeholder="San Francisco" pattern=".[A-Za-z ]{0,50}" data-error="Invalid City" required>
<!--    <div class="help-block with-errors"></div>-->
    </div> 
  </div>               
  <div class="form-group has-feedback">
    <label class="control-label col-sm-2">Zip Code</label>
    <div class="col-sm-10">
    <input type="text" name="zipCode" class="form-control"  placeholder="94321" pattern="[0-9]{5,5}" data-error="Invalid Zipcode" required>
<!--    <div class="help-block with-errors"></div>-->
    </div> 
  </div>    

<div class="form-group" style="padding-left:200px;" >

  <div class="form-group col-sm-2">
      <br>
    <label>Number of Floors:</label>
  <select name="numFloors"  class="form-control col-sm-2">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    <option>5</option>
  </select>
  </div>                  
  <div class="form-group col-sm-2 col-sm-push-1">
      <br>
    <label>Number of Beds:</label>
  <select name="numBeds" id="numBeds" class="form-control col-sm-2">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    <option>5</option>
    <option>6</option>
    <option>7</option>
    <option>8</option>
    <option>9</option>
    <option>10</option>
  </select>
  </div>  
    <div class="form-group col-sm-2 col-sm-push-2">
      <br>
    <label>Number of Baths:</label>
  <select name="numBaths" class="form-control col-sm-2">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    <option>5</option>
    <option>6</option>
    <option>7</option>
    <option>8</option>
    <option>9</option>
    <option>10</option>
  </select>
  </div> 
  <div class="form-group col-sm-2 col-sm-push-3">
      <br>
    <label>Roommates:</label>
      <select name="numRoommates" class="form-control col-sm-2">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    <option>5</option>
  </select>
  </div>
</div>
  <div class="form-group" style="padding-left:200px; padding-right:10px;">
      <div class="form-group col-sm-3">
        <div class="input-group">
            <input type="text" name="sqrFeet" class="form-control" placeholder="Floor Size" pattern="([1-9]{1,1})+([0-9]{0,3})" data-error="Numbers only. (9999 max)" required>
            <div class="input-group-addon">Square Feet</div>   
        </div>
<!--        <div class="help-block with-errors"></div>-->
      </div>
      <div class="form-group col-sm-3 col-sm-push-1">
         <div class="input-group">
            <div class="input-group-addon">$</div>
            <input type="text" name="monthlyRent" class="form-control" placeholder="Monthly Rent" pattern="([1-9]{1,1})+([0-9]{0,3})" data-error="Numbers only. (99999 max)" required>
         </div>
<!--        <div class="help-block with-errors"></div>-->
      </div>
        <div class="form-group col-sm-3 col-sm-push-2">
            <div class="input-group">
              <div class="input-group-addon">$</div>
              <input type="text" name="securityDeposit" class="form-control" placeholder="Security Deposit"  pattern="([1-9]{1,1})+([0-9]{0,3})" data-error="Numbers only. (9999 max)" required>
             
            </div>
<!--            <div class="help-block with-errors"></div>-->
      </div>
    </div>
  
    <label class="control-label col-sm-3" style="padding-left:10px;" >Upload your image here</label>
    <input type="file" name="pic1" id="pic1">

        <br>
    <div class="form-group" style="padding-left:100px; padding-right: 20px;padding-bottom:10px;">
        <br>
        <br>
    <label class="control-label col-sm-1">Description</label>   
        <textarea name="description" class="form-control"  rows="5"  placeholder="Write about the housing here."></textarea>
  </div>
  <div class="text-center">
    <button type="submit" class="btn btn-primary"  style="width:200px;">Post</button>    
    </div>
</form>  
                
                
             
    </div>
        
    
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script>
        +function(a){"use strict";function b(b){return b.is('[type="checkbox"]')?b.prop("checked"):b.is('[type="radio"]')?!!a('[name="'+b.attr("name")+'"]:checked').length:b.val()}function c(b){return this.each(function(){var c=a(this),e=a.extend({},d.DEFAULTS,c.data(),"object"==typeof b&&b),f=c.data("bs.validator");(f||"destroy"!=b)&&(f||c.data("bs.validator",f=new d(this,e)),"string"==typeof b&&f[b]())})}var d=function(c,e){this.options=e,this.validators=a.extend({},d.VALIDATORS,e.custom),this.$element=a(c),this.$btn=a('button[type="submit"], input[type="submit"]').filter('[form="'+this.$element.attr("id")+'"]').add(this.$element.find('input[type="submit"], button[type="submit"]')),this.update(),this.$element.on("input.bs.validator change.bs.validator focusout.bs.validator",a.proxy(this.onInput,this)),this.$element.on("submit.bs.validator",a.proxy(this.onSubmit,this)),this.$element.on("reset.bs.validator",a.proxy(this.reset,this)),this.$element.find("[data-match]").each(function(){var c=a(this),d=c.data("match");a(d).on("input.bs.validator",function(a){b(c)&&c.trigger("input.bs.validator")})}),this.$inputs.filter(function(){return b(a(this))}).trigger("focusout"),this.$element.attr("novalidate",!0),this.toggleSubmit()};d.VERSION="0.11.5",d.INPUT_SELECTOR=':input:not([type="hidden"], [type="submit"], [type="reset"], button)',d.FOCUS_OFFSET=20,d.DEFAULTS={delay:500,html:!1,disable:!0,focus:!0,custom:{},errors:{match:"Does not match",minlength:"Not long enough"},feedback:{success:"glyphicon-ok",error:"glyphicon-remove"}},d.VALIDATORS={"native":function(a){var b=a[0];return b.checkValidity?!b.checkValidity()&&!b.validity.valid&&(b.validationMessage||"error!"):void 0},match:function(b){var c=b.data("match");return b.val()!==a(c).val()&&d.DEFAULTS.errors.match},minlength:function(a){var b=a.data("minlength");return a.val().length<b&&d.DEFAULTS.errors.minlength}},d.prototype.update=function(){return this.$inputs=this.$element.find(d.INPUT_SELECTOR).add(this.$element.find('[data-validate="true"]')).not(this.$element.find('[data-validate="false"]')),this},d.prototype.onInput=function(b){var c=this,d=a(b.target),e="focusout"!==b.type;this.$inputs.is(d)&&this.validateInput(d,e).done(function(){c.toggleSubmit()})},d.prototype.validateInput=function(c,d){var e=(b(c),c.data("bs.validator.errors"));c.is('[type="radio"]')&&(c=this.$element.find('input[name="'+c.attr("name")+'"]'));var f=a.Event("validate.bs.validator",{relatedTarget:c[0]});if(this.$element.trigger(f),!f.isDefaultPrevented()){var g=this;return this.runValidators(c).done(function(b){c.data("bs.validator.errors",b),b.length?d?g.defer(c,g.showErrors):g.showErrors(c):g.clearErrors(c),e&&b.toString()===e.toString()||(f=b.length?a.Event("invalid.bs.validator",{relatedTarget:c[0],detail:b}):a.Event("valid.bs.validator",{relatedTarget:c[0],detail:e}),g.$element.trigger(f)),g.toggleSubmit(),g.$element.trigger(a.Event("validated.bs.validator",{relatedTarget:c[0]}))})}},d.prototype.runValidators=function(c){function d(a){return c.data(a+"-error")}function e(){var a=c[0].validity;return a.typeMismatch?c.data("type-error"):a.patternMismatch?c.data("pattern-error"):a.stepMismatch?c.data("step-error"):a.rangeOverflow?c.data("max-error"):a.rangeUnderflow?c.data("min-error"):a.valueMissing?c.data("required-error"):null}function f(){return c.data("error")}function g(a){return d(a)||e()||f()}var h=[],i=a.Deferred();return c.data("bs.validator.deferred")&&c.data("bs.validator.deferred").reject(),c.data("bs.validator.deferred",i),a.each(this.validators,a.proxy(function(a,d){var e=null;(b(c)||c.attr("required"))&&(c.data(a)||"native"==a)&&(e=d.call(this,c))&&(e=g(a)||e,!~h.indexOf(e)&&h.push(e))},this)),!h.length&&b(c)&&c.data("remote")?this.defer(c,function(){var d={};d[c.attr("name")]=b(c),a.get(c.data("remote"),d).fail(function(a,b,c){h.push(g("remote")||c)}).always(function(){i.resolve(h)})}):i.resolve(h),i.promise()},d.prototype.validate=function(){var b=this;return a.when(this.$inputs.map(function(c){return b.validateInput(a(this),!1)})).then(function(){b.toggleSubmit(),b.focusError()}),this},d.prototype.focusError=function(){if(this.options.focus){var b=this.$element.find(".has-error:first :input");0!==b.length&&(a("html, body").animate({scrollTop:b.offset().top-d.FOCUS_OFFSET},250),b.focus())}},d.prototype.showErrors=function(b){var c=this.options.html?"html":"text",d=b.data("bs.validator.errors"),e=b.closest(".form-group"),f=e.find(".help-block.with-errors"),g=e.find(".form-control-feedback");d.length&&(d=a("<ul/>").addClass("list-unstyled").append(a.map(d,function(b){return a("<li/>")[c](b)})),void 0===f.data("bs.validator.originalContent")&&f.data("bs.validator.originalContent",f.html()),f.empty().append(d),e.addClass("has-error has-danger"),e.hasClass("has-feedback")&&g.removeClass(this.options.feedback.success)&&g.addClass(this.options.feedback.error)&&e.removeClass("has-success"))},d.prototype.clearErrors=function(a){var c=a.closest(".form-group"),d=c.find(".help-block.with-errors"),e=c.find(".form-control-feedback");d.html(d.data("bs.validator.originalContent")),c.removeClass("has-error has-danger has-success"),c.hasClass("has-feedback")&&e.removeClass(this.options.feedback.error)&&e.removeClass(this.options.feedback.success)&&b(a)&&e.addClass(this.options.feedback.success)&&c.addClass("has-success")},d.prototype.hasErrors=function(){function b(){return!!(a(this).data("bs.validator.errors")||[]).length}return!!this.$inputs.filter(b).length},d.prototype.isIncomplete=function(){function c(){var c=b(a(this));return!("string"==typeof c?a.trim(c):c)}return!!this.$inputs.filter("[required]").filter(c).length},d.prototype.onSubmit=function(a){this.validate(),(this.isIncomplete()||this.hasErrors())&&a.preventDefault()},d.prototype.toggleSubmit=function(){this.options.disable&&this.$btn.toggleClass("disabled",this.isIncomplete()||this.hasErrors())},d.prototype.defer=function(b,c){return c=a.proxy(c,this,b),this.options.delay?(window.clearTimeout(b.data("bs.validator.timeout")),void b.data("bs.validator.timeout",window.setTimeout(c,this.options.delay))):c()},d.prototype.reset=function(){return this.$element.find(".form-control-feedback").removeClass(this.options.feedback.error).removeClass(this.options.feedback.success),this.$inputs.removeData(["bs.validator.errors","bs.validator.deferred"]).each(function(){var b=a(this),c=b.data("bs.validator.timeout");window.clearTimeout(c)&&b.removeData("bs.validator.timeout")}),this.$element.find(".help-block.with-errors").each(function(){var b=a(this),c=b.data("bs.validator.originalContent");b.removeData("bs.validator.originalContent").html(c)}),this.$btn.removeClass("disabled"),this.$element.find(".has-error, .has-danger, .has-success").removeClass("has-error has-danger has-success"),this},d.prototype.destroy=function(){return this.reset(),this.$element.removeAttr("novalidate").removeData("bs.validator").off(".bs.validator"),this.$inputs.off(".bs.validator"),this.options=null,this.validators=null,this.$element=null,this.$btn=null,this};var e=a.fn.validator;a.fn.validator=c,a.fn.validator.Constructor=d,a.fn.validator.noConflict=function(){return a.fn.validator=e,this},
            a(window).on("load",function(){a('form[data-toggle="validator"]').each(function(){var b=a(this);c.call(b,b.data())})})}(jQuery);
    </script>    
    </body>
</html>  
