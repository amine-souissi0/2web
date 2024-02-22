import { RequestSupply } from "./requestSupply";
import {Society} from "./society";
export class Devis {
    id: number;
    price: number;
    quantity: number;
    description: string;
    file: string;
    status: boolean;
    requestSupply: RequestSupply;
    society: Society;
}