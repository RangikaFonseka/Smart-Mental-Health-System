
    let currentPage = 1;
    const questions = document.querySelectorAll('.container');

    function showPage(page) {
        questions.forEach((question, index) => {
            if (index === page - 1) {
                question.classList.add('highlight');
                question.classList.remove('dimmed');
            } else {
                question.classList.remove('highlight');
                question.classList.add('dimmed');
            }
        });
    }

    function previousPage() {
        if (currentPage > 1) {
            currentPage--;
            showPage(currentPage);
        }
    }

    function nextPage() {
        if (currentPage < questions.length) {
            currentPage++;
            showPage(currentPage);
        }
    }

    // Show the initial page (first question)
    showPage(currentPage);
