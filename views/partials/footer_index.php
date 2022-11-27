</div>
<div class="row"></div>
<div class="row"></div>
<footer class="page-footer orange darken-2">

  <div class="footer-copyright">
    <div class="containe-fluid">
      <p class="white-text">
        © <span class="white-text" id="date"></span> Copyright IFTS 4
      </p>

    </div>
  </div>
</footer>

<!-- Alertyfy Script -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<!-- custom js -->
<script src="../../public/js/materialize.js"></script>
<script>
  const date= new Date();
document.getElementById('date').innerHTML= date.getFullYear();
</script>
</body>

</html>