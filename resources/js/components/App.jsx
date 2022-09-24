import React from "react";
import { createRoot } from "react-dom/client";
export default function App() {
    return (
        <div className="">
            <h2>Hello Reactjs</h2>
        </div>
    );
}
const container = document.getElementById("App");
const root = createRoot(container);
root.render(<App />);
