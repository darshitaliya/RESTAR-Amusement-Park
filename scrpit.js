window.addEventListener("load", function () {
    setTimeout(function open() {
        const popup = document.querySelector(".popup");
        const offerImage = document.getElementById("offerImage");

        if (popup && offerImage) {
            popup.style.display = "block";

            const images = [
                "assets/images/offers/offer-1.jpg",
                "assets/images/offers/offer-2.jpg",
                "assets/images/offers/offer-3.jpg",
                "assets/images/offers/offer-4.jpg",
                "assets/images/offers/offer-5.jpg"
            ];

            function changeImage() {
                const randomImage = images[Math.floor(Math.random() * images.length)];
                offerImage.src = randomImage;
                console.log("New Image:", randomImage); // Debugging
            }

            // Set an initial random image
            changeImage();

            // Change the image every 3 seconds
            const imageInterval = setInterval(changeImage, 3000);

            // Close popup and stop changing images when the close button is clicked
            document.querySelector("#close").addEventListener("click", function () {
                popup.style.display = "none";
                clearInterval(imageInterval); // Stop changing images
            });
        }
    }, 1000);
});
