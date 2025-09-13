const images = [
    "asset/index/baskcafe1.jpg",
    "asset/index/baskcafe2.jpg",
    "asset/index/baskcafe3.jpg",
    "asset/index/baskcafe4.jpg",
    "asset/index/baskcafe5.jpg"
  ];

  let currentIndex = 0;
  const carouselImage = document.getElementById("carouselImage");
  const prevBtn = document.getElementById("prevBtn");
  const nextBtn = document.getElementById("nextBtn");

  function updateImage(index) {
    carouselImage.src = images[index];
  }

  prevBtn.addEventListener("click", () => {
    currentIndex = (currentIndex - 1 + images.length) % images.length;
    updateImage(currentIndex);
  });

  nextBtn.addEventListener("click", () => {
    currentIndex = (currentIndex + 1) % images.length;
    updateImage(currentIndex);
  });

  const autoScrollInterval = 3000; 
  setInterval(() => {
    currentIndex = (currentIndex + 1) % images.length;
    updateImage(currentIndex);
  }, autoScrollInterval);




