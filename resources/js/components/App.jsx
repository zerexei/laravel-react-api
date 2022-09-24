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

    return <div>User: {user.name}</div>;
}
const container = document.getElementById("App");
const root = createRoot(container);
root.render(<App />);
