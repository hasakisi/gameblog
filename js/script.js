let changeIcon = function(icon) {
    icon.classList.toggle('far'); // 'far' sınıfını ekleyip çıkartır
    icon.classList.toggle('fas'); // 'fas' sınıfını ekler veya çıkartır
}
let fillHeart = function(icon) {
    icon.classList.add('fas'); // 'fas' sınıfını ekler (içi dolu kalp)
}

let emptyHeart = function(icon) {
    if (icon.classList.contains('fas')) {
        icon.classList.remove('fas'); // 'fas' sınıfını kaldırır (içi dolu kalp)
    }
}



