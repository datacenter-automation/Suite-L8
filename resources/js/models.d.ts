declare namespace App.Models {
    export interface AuthLog {
        id: number;
        user_id: number;
        blame_on_user_id: number;
        ip_address: string | null;
        session_id: string | null;
        user_agent: string | null;
        killed_from_console: boolean;
        logged_out_at: string | null;
        created_at: string | null;
        updated_at: string | null;
        user?: App.Models.User | null;
        blameOnUser?: App.Models.User | null;
    }
    export interface Employee {
        id: number;
        name: string;
        email: string;
        phone_number: string;
        dob: string;
        created_at: string | null;
        updated_at: string | null;
    }
    export interface Feedback {
        id: string;
        ticket_id: number;
        stars: string;
        created_at: string | null;
        updated_at: string | null;
        ticket?: App.Models.Ticket | null;
    }
    export interface Internal {
        id: number;
        name: string;
        username: string;
        email: string;
        email_verified_at: string | null;
        salt: string;
        password: string;
        forget_token: string | null;
        active_token: string | null;
        blocked_at: string | null;
        remember_token: string | null;
        created_at: string | null;
        updated_at: string | null;
    }
    export interface Location {
        id: number;
        location_group_id: number | null;
        name: string;
        description: string | null;
        deleted_at: string | null;
        created_at: string | null;
        updated_at: string | null;
        locationGroup?: App.Models.LocationGroup | null;
        machine?: App.Models.Machine | null;
    }
    export interface LocationGroup {
        id: number;
        name: string;
        description: string | null;
        deleted_at: string | null;
        created_at: string | null;
        updated_at: string | null;
        locations?: Array<App.Models.Location> | null;
    }
    export interface Logger {
        id: number;
        method: string;
        controller: string;
        action: string;
        parameter: string;
        headers: string;
        origin_ip_address: string;
        user_id: number;
        created_at: string | null;
        updated_at: string | null;
        user?: App.Models.User | null;
    }
    export interface Machine {
        id: number;
        machine_type_id: number;
        location_id: number | null;
        user_id: number | null;
        name: string;
        deleted_at: string | null;
        created_at: string | null;
        updated_at: string | null;
        location?: App.Models.Location | null;
        type?: App.Models.MachineType | null;
        logs?: Array<App.Models.MachineLog> | null;
        softwareInstalled?: Array<App.Models.SoftwareInstalled> | null;
        notes?: Array<App.Models.MachineNote> | null;
        user?: App.Models.User | null;
    }
    export interface MachineLog {
        id: number;
        machine_id: number;
        user_id: number;
        content: string;
        deleted_at: string | null;
        created_at: string | null;
        updated_at: string | null;
        machine?: App.Models.Machine | null;
        user?: App.Models.User | null;
    }
    export interface MachineNote {
        id: number;
        machine_id: number;
        content: string;
        deleted_at: string | null;
        created_at: string | null;
        updated_at: string | null;
        machine?: App.Models.Machine | null;
        attachments?: Array<App.Models.MachineNoteAttachment> | null;
    }
    export interface MachineNoteAttachment {
        id: number;
        machine_note_id: number;
        file_name: string;
        created_at: string | null;
        updated_at: string | null;
        machineNote?: App.Models.MachineNote | null;
    }
    export interface MachineType {
        id: number;
        name: string;
        deleted_at: string | null;
        created_at: string | null;
        updated_at: string | null;
        machines?: Array<App.Models.Machine> | null;
    }
    export interface Message {
        id: number;
        type: string;
        from_user_id: number | null;
        to_user_id: number | null;
        body: string;
        attachment: string | null;
        seen: boolean;
        deleted_at: string | null;
        created_at: string | null;
        updated_at: string | null;
        fromUser?: App.Models.User | null;
        toUser?: App.Models.User | null;
    }
    export interface Software {
        id: number;
        name: string;
        key: string;
        deleted_at: string | null;
        created_at: string | null;
        updated_at: string | null;
        softwareInstalled?: Array<App.Models.SoftwareInstalled> | null;
        softwareCategory?: App.Models.SoftwareCategory | null;
    }
    export interface SoftwareCategory {
        id: number;
        name: string;
        deleted_at: string | null;
        created_at: string | null;
        updated_at: string | null;
        software?: Array<App.Models.Software> | null;
    }
    export interface SoftwareInstalled {
        machine?: App.Models.Machine | null;
        software?: App.Models.Software | null;
    }
    export interface Ticket {
        id: number;
        user_id: number;
        status_id: number;
        content: string;
        read: boolean;
        deleted_at: string | null;
        created_at: string | null;
        updated_at: string | null;
        user?: App.Models.User | null;
        status?: App.Models.TicketStatus | null;
        ticketAttachments?: Array<App.Models.TicketAttachment> | null;
        ticketComments?: Array<App.Models.TicketComment> | null;
        ticketLogs?: Array<App.Models.TicketLog> | null;
        ticketStatus?: App.Models.TicketStatus | null;
        ticketWorker?: App.Models.TicketWorker | null;
    }
    export interface TicketAttachment {
        id: number;
        ticket_id: number;
        file_name: string;
        created_at: string | null;
        updated_at: string | null;
        ticket?: App.Models.Ticket | null;
    }
    export interface TicketComment {
        id: number;
        ticket_id: number;
        user_id: number;
        content: string;
        deleted_at: string | null;
        created_at: string | null;
        updated_at: string | null;
        ticket?: App.Models.Ticket | null;
        user?: App.Models.User | null;
        ticketCommentAttachments?: Array<App.Models.TicketCommentAttachment> | null;
    }
    export interface TicketCommentAttachment {
        id: number;
        ticket_comment_id: number;
        file_name: string;
        created_at: string | null;
        updated_at: string | null;
        ticketComment?: App.Models.TicketComment | null;
    }
    export interface TicketLog {
        id: number;
        ticket_id: number;
        user_id: number;
        content: string;
        deleted_at: string | null;
        created_at: string | null;
        updated_at: string | null;
        ticket?: App.Models.Ticket | null;
        user?: App.Models.User | null;
    }
    export interface TicketStatus {
        id: number;
        name: string;
        color: string;
        created_at: string | null;
        updated_at: string | null;
        tickets?: Array<App.Models.Ticket> | null;
    }
    export interface TicketWorker {
        id: number;
        ticket_id: number;
        user_id: number;
        deleted_at: string | null;
        created_at: string | null;
        updated_at: string | null;
        tickets?: Array<App.Models.Ticket> | null;
        ticket?: App.Models.Ticket | null;
        user?: App.Models.User | null;
    }
    export interface Upload {
        id: number;
        filename_uniqid: string;
        user_id: number;
        filename: string;
        file_attibutes: string;
        encrypted_at: string | null;
        uploader_ip_address: string;
        deleted_at: string | null;
        created_at: string | null;
        updated_at: string | null;
        user?: App.Models.User | null;
    }
    export interface User {
        id: number;
        name: string;
        username: string;
        email: string;
        email_verified_at: string | null;
        salt: string;
        password: string;
        api_token: string | null;
        register_ip: string;
        forget_token: string | null;
        active_token: string | null;
        blocked_at: string | null;
        remember_token: string | null;
        created_at: string | null;
        updated_at: string | null;
        stripe_id: string | null;
        card_brand: string | null;
        card_last_four: string | null;
        trial_ends_at: string | null;
        machines?: Array<App.Models.Machine> | null;
        tickets?: Array<App.Models.Ticket> | null;
    }
    export interface Vendor {
        id: number;
        company_name: string;
        username: string;
        email: string;
        email_verified_at: string | null;
        salt: string;
        password: string;
        api_token: string | null;
        register_ip: string;
        forget_token: string | null;
        active_token: string | null;
        blocked_at: string | null;
        remember_token: string | null;
        created_at: string | null;
        updated_at: string | null;
    }
    export interface Whitegloves {
        id: number;
        company_name: string;
        username: string;
        email: string;
        email_verified_at: string | null;
        salt: string;
        password: string;
        api_token: string | null;
        register_ip: string;
        forget_token: string | null;
        active_token: string | null;
        blocked_at: string | null;
        remember_token: string | null;
        created_at: string | null;
        updated_at: string | null;
    }
}