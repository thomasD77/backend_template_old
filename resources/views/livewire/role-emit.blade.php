<div>

    <div id="role">{{$role}}</div>
    <script>
      var modal =  $('#exampleModal');
      var role = document.getElementById("role");

      console.log(role)

       window.addEventListener('closeModal', event => {
            $('#exampleModal#role').modal('hide');
        })

    </script>
</div>
