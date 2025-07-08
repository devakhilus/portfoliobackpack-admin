:root {
--bg: #f9f9f9;
--text: #333;
--card: #fff;
--accent: #0077cc;
--subtext: #555;
--shadow: rgba(0,0,0,0.1);
--skill-bg: #e0e0e0;
--skill-text: #000;
}

[data-theme='dark'] {
--bg: #121212;
--text: #f0f0f0;
--card: #1f1f1f;
--accent: #66aaff;
--subtext: #aaa;
--shadow: rgba(255,255,255,0.1);
--skill-bg: #2a2a2a;
--skill-text: #f0f0f0;
}

body {
font-family: 'Segoe UI', sans-serif;
margin: 0;
padding: 0;
background-color: var(--bg);
color: var(--text);
line-height: 1.6;
transition: background 0.3s, color 0.3s;
}

header {
background-color: #1a1a1a;
color: #fff;
padding: 3rem 1rem 2rem;
text-align: center;
position: relative;
}

.toggle-btn {
position: absolute;
top: 1rem;
right: 1rem;
background: var(--card);
border: none;
padding: 0.5rem 1rem;
border-radius: 20px;
font-size: 0.9rem;
cursor: pointer;
box-shadow: 0 2px 6px var(--shadow);
transition: background 0.3s, color 0.3s;
}

header h1 {
margin: 0;
font-size: 2.8rem;
opacity: 0;
animation: fadeSlide 1.2s ease-out forwards;
}

header p {
margin: 1rem auto 0;
font-size: 1.2rem;
color: #ccc;
white-space: nowrap;
overflow: hidden;
border-right: 2px solid #ccc;
display: inline-block;
animation: typing 3s steps(40, end) 1s forwards, blink 0.75s step-end infinite;
}

@media (max-width: 600px) {
header p {
font-size: 1rem;
animation: typing 2.5s steps(25, end) 1s forwards, blink 0.75s step-end infinite;
}
}



@keyframes fadeSlide {
from { opacity: 0; transform: translateY(-20px); }
to { opacity: 1; transform: translateY(0); }
}

@keyframes typing {
from { width: 0 }
to { width: 44ch }
}

@keyframes blink {
0%, 100% { border-color: transparent }
50% { border-color: #ccc }
}

section {
padding: 2rem 1rem;
max-width: 900px;
margin: auto;
}

h2 {
border-bottom: 2px solid #eaeaea;
padding-bottom: 0.5rem;
margin-bottom: 1.5rem;
}

.footer {
background-color: #1a1a1a;
color: #aaa;
text-align: center;
padding: 1rem;
}

a {
color: var(--accent);
text-decoration: none;
}

a:hover {
text-decoration: underline;
}

.skills-list {
display: flex;
flex-wrap: wrap;
gap: 1rem;
}

.skill {
background: var(--skill-bg);
color: var(--skill-text);
padding: 0.5rem 1rem;
border-radius: 5px;
transition: background 0.3s, color 0.3s;
}

.card {
background: var(--card);
border-radius: 10px;
box-shadow: 0 4px 10px var(--shadow);
width: 300px;
padding: 1.2rem;
transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
transform: scale(1.05);
box-shadow: 0 8px 20px var(--shadow);
}

.projects-container {
display: flex;
flex-wrap: wrap;
gap: 1rem;
justify-content: center;
}

details {
margin-bottom: 1rem;
border: 1px solid #ccc;
border-radius: 6px;
padding: 0.8rem;
background: var(--card);
color: var(--text);
}

summary {
cursor: pointer;
font-weight: bold;
font-size: 1.1rem;
}

.contact-icons {
display: flex;
flex-wrap: wrap;
justify-content: center;
gap: 2rem;
font-size: 1.1rem;
text-align: center;
}

.contact-icons a {
text-decoration: none;
color: var(--text);
transition: 0.3s;
}

.contact-icons div {
padding: 1rem 1.5rem;
background: var(--card);
border-radius: 10px;
box-shadow: 0 4px 10px var(--shadow);
}

@media (max-width: 500px) {
.card, .contact-icons div {
width: 100%;
}

header p {
animation: typing 3s steps(32, end) 1s forwards, blink 0.75s step-end infinite;
}

@keyframes typing {
from { width: 0 }
to { width: 32ch }
}
}
.slogan.mobile {
display: none;
}
.slogan.desktop {
display: inline-block;
}

/* Mobile view */
@media (max-width: 600px) {
.slogan.mobile {
display: inline-block;
font-size: 1rem;
animation: typing 2s steps(20, end) 1s forwards, blink 0.75s step-end infinite;
}
.slogan.desktop {
display: none;
}
}
.slogan {
margin-top: 1rem;
color: #ccc;
white-space: nowrap;
overflow: hidden;
border-right: 2px solid #ccc;
width: 0;
display: inline-block;
animation: typing 3s steps(40, end) 1s forwards, blink 0.75s step-end infinite;
}

.slogan.mobile {
display: none;
}

.slogan.desktop {
font-size: 1.2rem;
}

/* Mobile-specific adjustments */
@media (max-width: 600px) {
.slogan.desktop {
display: none;
}

.slogan.mobile {
display: inline-block;
font-size: 1rem;
animation: typing 2.2s steps(25, end) 1s forwards, blink 0.75s step-end infinite;
}
}
.contact-intro {
text-align: center;
font-size: 1.1rem;
margin-bottom: 2rem;
padding: 0 1rem;
}

@media (max-width: 500px) {
.contact-intro {
font-size: 1rem;
line-height: 1.4;
}
}