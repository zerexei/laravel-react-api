import React, { useEffect, useState } from "react";
import { createRoot } from "react-dom/client";

export default function App() {
    let [user, setUser] = useState({});

    useEffect(() => {
        getUser();
        console.log(user);
    }, []);

    async function getUser() {
        const res = await fetch("/api/test");
        user = setUser(await res.json());
    }

    console.log(window.csrf_field);
    return (
        <div>
            <form>
                <div>
                    <label>Chirp</label>
                    <textarea name="" id="" cols="30" rows="10"></textarea>
                </div>
                <div>
                    <button>Submit</button>
                </div>
            </form>
        </div>
    );
}
const container = document.getElementById("App");
const root = createRoot(container);
root.render(<App />);
