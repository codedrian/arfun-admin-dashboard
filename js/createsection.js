
import {
    doc,
    addDoc,
    getFirestore,
    collection,
    getDocs,
    query,
    where,
} from "https://www.gstatic.com/firebasejs/9.15.0/firebase-firestore.js";

var db = getFirestore()

    var registerBtn = document.querySelector('[name="register_button"]');

    if (registerBtn != null) {
        registerBtn.addEventListener("click", async (e) => {
            //e.preventDefault();
            //e.stopPropagation();

            registerBtn.setAttribute("disabled", "");

            var a = document.querySelector("#section");
            a.setAttribute("disabled", "");

            //submit data
            //  test if the current section is present
            const dbRef = collection(db, 'sections');
            const q = query(dbRef, where('section', '==', a.value));
            const qs = await getDocs(q);

            qs.forEach(async (data) => {
                if (data.data().section == a.value) {
                    alert("Section already exists");
                    registerBtn.removeAttribute("disabled");
                    a.removeAttribute("disabled");
                }
            });
            if (qs.size == 0) {
                const docRef = await addDoc(dbRef, {
                    section: a.value,
                });
                alert("Successfully Added " + a.value);

            }
            location.reload();
        });
    }
