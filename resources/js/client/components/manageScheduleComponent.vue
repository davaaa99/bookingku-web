<template>
  <div>
    <b-form>
      <b-form-group>
        <b-form-select class= "myselect"
          id="input-2"
          v-model="form.location"
          :options="locations"
          required
          size:lg
        ></b-form-select>
      </b-form-group>

      <b-form-group>
        <b-form-select class= "myselect"
          id="input-3"
          v-model="form.field"
          :options="fieldss"
          required
        ></b-form-select>
      </b-form-group>

      <b-form-group id="input-group-1" label="Price:" label-for="input-1">
        <b-form-input
          id="input-1"
          v-model="form.price"
          required
          placeholder="Enter Price"
        ></b-form-input>
      </b-form-group>

      <b-form-group id="input-group-4" label="Down Payment:" label-for="input-4">
        <b-form-input
          id="input-4"
          v-model="form.dp"
          required
          placeholder="Enter Down Payment"
        ></b-form-input>
      </b-form-group>
        <b-form-group id="input-group-5" label="Day :" label-for="input-5">
        <b-form-checkbox-group class= "myselect"
            v-model="form.day"
            :options="options"
            switches
        ></b-form-checkbox-group>
        </b-form-group>

        <b-form-group id="input-group-8" label="Time Start:" label-for="input-8">
        <b-form-select class= "myselect"
          id="input-8"
          v-model="form.t_start"
          :options="t_starts"
          required
        ></b-form-select>
        </b-form-group>

         <b-form-group id="input-group-9" label="Time Finish:" label-for="input-9">
        <b-form-select class= "myselect"
          id="input-8"
          v-model="form.t_finish"
          :options="t_finishs"
          required
        ></b-form-select>
        </b-form-group>

      <b-button type="add" variant="primary">Add</b-button>
        
        <div class="spacer-20"></div>
          <b-table fixed border small :items="items" :fields="fields" class="thead-light" primary-key="id_location ">
            <button class="btn button badge" :class="classStatus(data.item.edit_manageschedule)" v-on:click="changeStatus(data.index)" ></button>
          </b-table>
        

<!-- coba tambahan -->
<!-- <div class="container">
	<div class="row">
		<table class="table table-hover table-responsive">
		    <thead>
		        <tr>
		            <th>Location</th>
		            <th>Field</th>
		            <th>Price</th>
		            <th>Down Payment</th>
                <th>Day</th>
                <th>Time</th>
		            <th>Edit</th>
		            <th>Delete</th>
		        </tr>
		    </thead>
		    <tbody>
		        <tr id="d1">
		            <td id="a1">Karawang</td>
		            <td id="f1">Progresif</td>
		            <td id="l1">Rp.200.000</td>
		            <td id="m1">50%</td>
                <td id="b1">Monday</td>
                <td id="c1">15:00 - 17:00</td>
		            <td><button type="button" data-toggle="modal" data-target="#edit" data-uid="1" class="update btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span></button></td>
		            <td><button type="button" data-toggle="modal" data-target="#delete" data-uid="1" class="delete btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></button></td>
		        </tr>
		        <tr id="d2">
		            <td id="a2">Bandung</td>
		            <td id="f2">D'Grove</td>
		            <td id="l2">Rp.500.000</td>
		            <td id="m2">75%</td>
                <td id="b2">Sunday</td>
                <td id="c2">07:00 - 11:00</td>
		            <td><button type="button" data-toggle="modal" data-target="#edit" data-uid="2" class="update btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span></button></td>
		            <td><button type="button" data-toggle="modal" data-target="#delete" data-uid="2" class="delete btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></button></td>
		        </tr>
		    </tbody>
		</table>
	</div>
</div>
<div id="edit" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Update Data</h4>
      </div>
      <div class="modal-body">
           <input id="an" type="text" class="form-control" name="fname" placeholder="Location">
           <input id="fn" type="text" class="form-control" name="fname" placeholder="Field">
           <input id="ln" type="text" class="form-control" name="fname" placeholder="Price">
           <input id="mn" type="text" class="form-control" name="fname" placeholder="Down Payment">
           <input id="bn" type="text" class="form-control" name="fname" placeholder="Day">
           <input id="cn" type="text" class="form-control" name="fname" placeholder="Time">
      </div>
      <div class="modal-footer">
        <button type="button" id="up" class="btn btn-warning" data-dismiss="modal">Update</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div id="delete" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Delete Data</h4>
      </div>
      <div class="modal-body">
        <strong>Are you sure you want to delete this data?</strong>
      </div>
      <div class="modal-footer">
        <button type="button" id="del" class="btn btn-danger" data-dismiss="modal">Delete</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> -->
<!-- end coba -->
        <b-button type="save" variant="primary">Save</b-button>
        <b-button type="back" variant="primary">Back</b-button>
    </b-form>
    <b-card class="mt-3" header="Form Data Result">
      <pre class="m-0">{{ form }}</pre>
    </b-card>
  </div>
</template>

<script type="text/javascript">
$(document).ready(function(){
   $(".update").click(function(){
       var id = $(this).data("uid");
       var a1 = $("#a1").html();
       var f1 = $("#f1").html();
       var l1 = $("#l1").html();
       var m1 = $("#m1").html();
       var b1 = $("#b1").html();
       var c1 = $("#c1").html();
       var a2 = $("#a2").html();
       var f2 = $("#f2").html();
       var l2 = $("#l2").html();
       var m2 = $("#m2").html();
       var b2 = $("#b2").html();
       var c2 = $("#c2").html();
       if(id==1){
           $("#an").val(a1);
           $("#fn").val(f1);
           $("#mn").val(m1);
           $("#ln").val(l1);
           $("#bn").val(b1);
           $("#cn").val(c1);
       }else if(id==2){
           $("#an").val(a2);
           $("#fn").val(f2);
           $("#mn").val(m2);
           $("#ln").val(l2);
           $("#bn").val(b2);
           $("#cn").val(c2);
       }
       $("#up").click(function(){
           if(id==1){
               var an = $("#an").val();
               var fn = $("#fn").val();
               var mn = $("#mn").val();
               var ln = $("#ln").val(); 
               var bn = $("#bn").val();
               var cn = $("#cn").val();
               $("#a1").html(an);   
               $("#f1").html(fn);
               $("#m1").html(mn);
               $("#l1").html(ln);
               $("#b1").html(bn);
               $("#c1").html(cn);
           }else if(id==2){
               var an = $("#an").val();
               var fn = $("#fn").val();
               var mn = $("#mn").val();
               var ln = $("#ln").val(); 
               var bn = $("#bn").val();
               var cn = $("#cn").val();
               $("#a2").html(an);   
               $("#f2").html(fn);
               $("#m2").html(mn);
               $("#l2").html(ln); 
               $("#b2").html(bn);
               $("#c2").html(cn);              
           }
       });
   });
   $(".delete").click(function(){
      var id = $(this).data("uid");
      $("#del").click(function(){
          if(id==1){
              $("#d1").html('');
          }else if(id==2){
              $("#d2").html('');
          }
      });
   });
});
  export default {
    data() {
      return {
        form: {
          location: null,
          field: null,
          price: '',
          dp:'',
          day: [],
          t_start : null,
          t_finish : null
        },
        fieldss: [{ text: 'Select One', value: null }, 'Progresif', 'D groove', 'Queen', 'Bikasoga'],
        locations: [{ text: 'Select One', value: null }, 'Bandung', 'Jakarta', 'Karawang', 'Bekasi'],
        t_starts: [{ text: 'Select One', value: null }, '00:00', '00:01', '00:02', '00:03'],
        t_finishs: [{ text: 'Select One', value: null }, '00:00', '00:01', '00:02', '00:03'],
          options: [
          { text: 'Monday', value: 'monday' },
          { text: 'Tueday', value: 'tuesday' },
          { text: 'Wednesday', value: 'wednesday' },
          { text: 'Thursday', value: 'thursday' },
          {text: 'Friday', value: 'friday' },
          {text: 'Saturday', value: 'saturday' },
          {text: 'Sunday', value: 'sunday' }
        ],
        items: [
          { location: 'Bandung', field: 'D groove', day: 'Monday', time: '15:00 - 16:00', price: 'Rp.200.000', dp: '50%'},
          { location: 'Bekasi', field: 'Progresif', day: 'Sunday', time: '20:00 - 22:00', price: 'Rp.150.000', dp: '25%'},
          { location: 'Jakarta', field: 'Queen', day: 'Wednesday', time: '07:00 - 09:00', price: 'Rp.300.000', dp: '75%' },
          {  location: 'Bandung', field: 'Bikasoga', day: 'Thrusday', time: '18:00 - 19:00', price: 'Rp.400.000', dp: '50%' }
        ],
        
        show: true
      }
    },
     
    methods: {
      onSubmit(evt) {
        evt.preventDefault()
        alert(JSON.stringify(this.form))
      },
      onReset(evt) {
        evt.preventDefault()
        // Reset our form values
        this.form.location = null
        this.form.field = null
        this.form.price = ''
        this.form.dp = ''
        this.form.day = []
        // Trick to reset/clear native browser form validation state
        this.show = false
        this.$nextTick(() => {
          this.show = true
        });
        $(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
	var actions = $("table td:last-child").html();
	// Append table with add row form on add new button click
    $(".add-new").click(function(){
		$(this).attr("disabled", "disabled");
		var index = $("table tbody tr:last-child").index();
        var row = '<tr>' +
            '<td><input type="text" class="form-control" name="name" id="name"></td>' +
            '<td><input type="text" class="form-control" name="department" id="department"></td>' +
            '<td><input type="text" class="form-control" name="phone" id="phone"></td>' +
			'<td>' + actions + '</td>' +
        '</tr>';
    	$("table").append(row);		
		$("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
        $('[data-toggle="tooltip"]').tooltip();
    });
	// Add row on add button click
	$(document).on("click", ".add", function(){
		var empty = false;
		var input = $(this).parents("tr").find('input[type="text"]');
        input.each(function(){
			if(!$(this).val()){
				$(this).addClass("error");
				empty = true;
			} else{
                $(this).removeClass("error");
            }
		});
		$(this).parents("tr").find(".error").first().focus();
		if(!empty){
			input.each(function(){
				$(this).parent("td").html($(this).val());
			});			
			$(this).parents("tr").find(".add, .edit").toggle();
			$(".add-new").removeAttr("disabled");
		}		
    });
	// Edit row on edit button click
	$(document).on("click", ".edit", function(){		
        $(this).parents("tr").find("td:not(:last-child)").each(function(){
			$(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
		});		
		$(this).parents("tr").find(".add, .edit").toggle();
		$(".add-new").attr("disabled", "disabled");
    });
	// Delete row on delete button click
	$(document).on("click", ".delete", function(){
        $(this).parents("tr").remove();
		$(".add-new").removeAttr("disabled");
    });
});
      }
    }
  }
</script>