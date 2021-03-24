<script>
  const selectElement = document.querySelector('.item_sort');
  // console.log(selectElement.value);
  selectElement.addEventListener('change',function() {
    if(selectElement.value === 'new') {
      history.replaceState('','index.php','?value=rnew');
      window.location.reload();
    }else if (selectElement.value === 'row') {
      history.replaceState('','index.php','?value=row');
      window.location.reload();
    }else if (selectElement.value === 'high') {
      history.replaceState('','index.php','?value=high');
      window.location.reload();
    }
  } );
</script>