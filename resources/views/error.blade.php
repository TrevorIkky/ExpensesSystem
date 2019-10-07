@if($errors->any())
<div class="error-handling">
  <span id = "error-title">Please check on the following errors</span>
  <ul>
      @foreach($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
  </ul>
</div>
@endif

@if($success = Session::get("SUCCESS"))
<div id="success-handling" class="success-handling">
    <span id = "error-title">{{$success}}</span>
  </div>
<script>
$(document).ready(()=>{
  var successDiv = document.getElementById("success-handling")
  setTimeout(()=>{
    successDiv.style.display = "none"
  },5000)
})
</script>
@endif


@if($failed = Session::get("FAILED"))
<div id="failed-handling" class="failed-handling">
    <span id = "error-title">{{$failed}}</span>
  </div>
<script>
</script>
@endif