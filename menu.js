function toggleDescription(item) {
    item.classList.toggle('active');
    
    const description = item.querySelector('.description');
    const title = item.querySelector('h2');
    
    if (description.style.display === 'block') {
        description.style.display = 'none';
        title.style.display = 'block'; 
    } else {
        description.style.display = 'block';
        title.style.display = 'none'; 
    }
}

