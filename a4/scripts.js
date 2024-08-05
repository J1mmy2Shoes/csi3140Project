
document.addEventListener('DOMContentLoaded', () => {
    // Admin interface
    fetch('admin.php')
        .then(response => response.json())
        .then(data => {
            const patientList = document.getElementById('patient-list');
            data.forEach(patient => {
                const patientItem = document.createElement('div');
                patientItem.textContent = `${patient.name} (${patient.code}) - Severity: ${patient.severity}, Wait Time: ${patient.wait_time}`;
                patientList.appendChild(patientItem);
            });
        });

    // User interface
    const form = document.getElementById('user-signin');
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        const formData = new FormData(form);
        fetch('user.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                const waitTimeDiv = document.getElementById('wait-time');
                if (data.error) {
                    waitTimeDiv.textContent = data.error;
                } else {
                    waitTimeDiv.textContent = `Approximate Wait Time: ${data.wait_time}`;
                }
            });
    });
});
