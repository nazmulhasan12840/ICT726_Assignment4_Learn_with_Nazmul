document.addEventListener('DOMContentLoaded', () => {
  const toggle=document.querySelector('.nav-toggle'); const nav=document.querySelector('.main-navigation');
  if(toggle&&nav){toggle.addEventListener('click',()=>{const open=nav.classList.toggle('open');toggle.setAttribute('aria-expanded',String(open));});}
  const featured=document.getElementById('featuredImage'), caption=document.getElementById('featuredCaption');
  document.querySelectorAll('.thumbnail-button').forEach(btn=>btn.addEventListener('click',()=>{
    if(featured){featured.src=btn.dataset.image||'';featured.alt=btn.dataset.alt||'';}
    if(caption) caption.textContent=btn.dataset.caption||'';
    document.querySelectorAll('.thumbnail-button').forEach(b=>b.classList.remove('active')); btn.classList.add('active');
  }));
});