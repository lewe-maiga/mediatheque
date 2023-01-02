import "../app";
import { render } from "solid-js/web";

import { AddMicrofilm, Autocompletes } from "../components";

const microfilms = document.querySelector(".microfilms") as HTMLElement;

render(() => <AddMicrofilm />, microfilms);

const autocomplete = document.querySelector("#autocomplete") as HTMLElement;

const data: Author[] = JSON.parse(autocomplete.dataset.authors as string);

render(() => <Autocompletes data={data} />, autocomplete);
