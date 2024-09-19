function showNotice(courseName, instructorName, courseLink, courseDescription) {
    const noticeContent = `
        <strong>Course Name:</strong> ${courseName}<br>
        <strong>Instructor:</strong> ${instructorName}<br>
        <strong>Description:</strong> ${courseDescription}<br>
        <strong>Link:</strong> <a href="${courseLink}" target="_blank">${courseLink}</a>`;

    document.getElementById('notice-content').innerHTML = noticeContent;

    // Show the notice and overlay with fade-in effect
    document.getElementById('course-notice').style.display = 'block';
    document.getElementById('overlay').style.display = 'block';
    setTimeout(() => {
        document.getElementById('course-notice').classList.add('fade-in');
    }, 50); // Small delay for smooth fade-in effect
}

function closeNotice() {
    // Fade-out effect
    document.getElementById('course-notice').classList.remove('fade-in');
    setTimeout(() => {
        document.getElementById('course-notice').style.display = 'none';
        document.getElementById('overlay').style.display = 'none';
    }, 300); // Adjust duration to match fade-out effect
}
