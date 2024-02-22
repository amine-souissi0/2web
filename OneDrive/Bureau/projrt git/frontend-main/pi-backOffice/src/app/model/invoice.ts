import { RequestSupply } from "./requestSupply";

export class Invoice {
    idInvoice: number;
    description: string;
    file: string;
    status: boolean;
    comment: string;
    requestSupply: RequestSupply;
}