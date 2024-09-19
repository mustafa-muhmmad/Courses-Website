function getRandomParticipants(min = 200, max = 2000) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

// Display the random number in the participants span
document.getElementById('participants').textContent = getRandomParticipants();
