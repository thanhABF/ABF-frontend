@if(Cookie::get('dark_mode') == '1')
<style>
  /* width */
.table-scroll-style::-webkit-scrollbar {
  width: 6px;
  height: 10px;
}

/* Track */
.table-scroll-style::-webkit-scrollbar-track {
  background: #1d2d40;
  border-radius: 20px;
}

/* Handle */
.table-scroll-style::-webkit-scrollbar-thumb {
  background: #4d5f7d;
  border-radius: 20px;
}

/* Handle on hover */
.table-scroll-style::-webkit-scrollbar-thumb:hover {
  background: #3b4961;
}
</style>
@else
<style>
  /* width */
.table-scroll-style::-webkit-scrollbar {
  width: 6px;
  height: 10px;
}

/* Track */
.table-scroll-style::-webkit-scrollbar-track {
  background: #f5f6fa;
  border-radius: 20px;
}

/* Handle */
.table-scroll-style::-webkit-scrollbar-thumb {
  background: #95a9c2;
  border-radius: 20px;
}

/* Handle on hover */
.table-scroll-style::-webkit-scrollbar-thumb:hover {
  background: #708094;
}
</style>
@endif
