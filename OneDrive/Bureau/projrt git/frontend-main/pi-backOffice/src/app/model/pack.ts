import { TypePack } from "./typePack";
import {Stand} from "./stand"
import { Forum } from "./forum";
export class Pack {
    id: number;
    typePack: TypePack;
    prix: number;
    statut: boolean;
    forum: Forum;
    stand: Stand;
}