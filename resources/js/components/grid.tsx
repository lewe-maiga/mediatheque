import { ParentProps } from "solid-js/types/render";

type GridProps = ParentProps<{ class?: string }>;

export const Grid: Component<GridProps> = (props) => {
    return (
        <ul
            class={`grid sm:grid-cols-2 xl:grid-cols-3 p-8 gap-3 ${props.class}`}
        >
            {props.children}
        </ul>
    );
};
