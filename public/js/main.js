document.addEventListener('DOMContentLoaded', function(){

  var alerts = document.querySelectorAll('.alert');
  alerts.forEach(function(alert){
    setTimeout(function(){
      alert.classList.add('fade');
      setTimeout(() => alert.remove(), 1000);
    }, 3200);
  });

  document.querySelectorAll('a.btn-danger').forEach(btn => {
    btn.addEventListener('click', function(e){
      if (!confirm('Are you sure you want to delete this item?')) e.preventDefault();
    });
  });

  document.querySelectorAll('form').forEach(form => {
    form.addEventListener('submit', function(e){
      var btn = form.querySelector('button[type=submit]');
      if (btn) btn.disabled = true;

      setTimeout(() => { if (btn) btn.disabled = false; }, 2500);
    });
  });
});