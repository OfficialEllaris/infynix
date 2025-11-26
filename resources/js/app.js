import "./bootstrap";

Livewire.on("openManageStudentModal", () => {
    let manageStudentModal = document.getElementById("manageStudentModal");
    if (manageStudentModal) manageStudentModal.showModal();
});

Livewire.on("closeManageStudentModal", () => {
    let manageStudentModal = document.getElementById("manageStudentModal");
    if (manageStudentModal) manageStudentModal.close();
});

Livewire.on("openManageSupervisorModal", () => {
    let manageSupervisorModal = document.getElementById(
        "manageSupervisorModal"
    );
    if (manageSupervisorModal) manageSupervisorModal.showModal();
});

Livewire.on("closeManageSupervisorModal", () => {
    let manageSupervisorModal = document.getElementById(
        "manageSupervisorModal"
    );
    if (manageSupervisorModal) manageSupervisorModal.close();
});
